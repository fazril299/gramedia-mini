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
                    'description' => 'Unlimited access to 30,000+ digital comics, weekly new releases, offline reading on iOS and Android.',
                ],
                (object) [
                    'id' => 2,
                    'name_package' => 'Annual (Best Value)',
                    'price' => 999000,
                    'color' => '#e62429',
                    'description' => 'Save over 40% vs monthly, includes 7-day free trial, and exclusive Infinity Comics access.',
                ],
                (object) [
                    'id' => 3,
                    'name_package' => 'Annual Plus (Collector)',
                    'price' => 1499000,
                    'color' => '#d4af37',
                    'description' => 'All Annual features plus physical Exclusive Membership Kit: Exclusive Marvel Legends figure, 2 variant comics, official pin & patch, and 10% discount at Disney Store.',
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
            return redirect()->route('login')->with('error', 'Please sign in first to subscribe to Marvel Unlimited.');
        }

        $package = SubscriptionPackage::findOrFail($id);

        $days = str_contains(strtolower($package->name_package), 'monthly') ? 30 : 365;

        SubscriptionUser::create([
            'user_id' => Auth::id(),
            'subscription_package_id' => $package->id,
            'expired_date' => now()->addDays($days),
        ]);

        return redirect()->route('unlimited')->with('success', 'Congratulations! You are now subscribed to ' . $package->name_package . '. Enjoy unlimited access to 30,000+ Marvel comics!');
    }
}
