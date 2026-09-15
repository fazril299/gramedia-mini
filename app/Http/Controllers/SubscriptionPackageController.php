<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use App\Models\SubscriptionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionPackageController extends Controller
{
    /**
     * Display the Marvel Unlimited subscription page.
     */
    public function index()
    {
        $packages = SubscriptionPackage::all();

        if ($packages->isEmpty()) {
            $packages = collect([
                (object) [
                    'id' => 1,
                    'name_package' => 'Monthly',
                    'price' => 149000,
                    'color' => '#202020',
                    'description' => 'Akses penuh ke 30.000+ komik digital, rilis mingguan terbaru, baca offline di iOS dan Android.',
                ],
                (object) [
                    'id' => 2,
                    'name_package' => 'Annual (Best Value)',
                    'price' => 999000,
                    'color' => '#e62429',
                    'description' => 'Hemat lebih dari 40% dibanding bulanan, termasuk 7-day free trial, dan akses eksklusif Infinity Comics.',
                ],
                (object) [
                    'id' => 3,
                    'name_package' => 'Annual Plus (Collector)',
                    'price' => 1499000,
                    'color' => '#d4af37',
                    'description' => 'Semua fitur Annual ditambah Exclusive Membership Kit fisik: Action figure Marvel Legends eksklusif, 2 komik varian, pin & patch resmi, serta diskon 10% di Disney Store.',
                ],
            ]);
        }

        $activeSubscription = null;
        if (Auth::check()) {
            $activeSubscription = SubscriptionUser::where('user_id', Auth::id())
                ->where('expired_date', '>=', now()->toDateString())
                ->with('subscriptionPackage')
                ->latest()
                ->first();
        }

        return view('unlimited', compact('packages', 'activeSubscription'));
    }

    /**
     * Process subscription action
     */
    public function subscribe(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan masuk terlebih dahulu untuk mulai berlangganan Marvel Unlimited.');
        }

        $package = SubscriptionPackage::findOrFail($id);

        $days = str_contains(strtolower($package->name_package), 'monthly') ? 30 : 365;

        SubscriptionUser::create([
            'user_id' => Auth::id(),
            'subscription_package_id' => $package->id,
            'expired_date' => now()->addDays($days),
        ]);

        return redirect()->route('unlimited')->with('success', 'Selamat! Anda telah resmi berlangganan paket ' . $package->name_package . '. Selamat menikmati akses ke 30.000+ komik Marvel!');
    }
}
