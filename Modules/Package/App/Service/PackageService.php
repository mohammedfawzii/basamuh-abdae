<?php

namespace Modules\Package\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\Package\App\Http\Requests\PackageRequest;
use Modules\Package\App\Models\Package;
use Modules\Package\App\resources\PackageResource;
use Modules\TreatmentSession\App\Models\TreatmentSession;

class PackageService
{
use success ,erorr;
    public function store(PackageRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $package = Package::create([
                'name' => $request->name,
                'total_price' => $this->calculateTotalPrice($request->treatment_session_ids, $request->quantities),
            ]);

            $package->treatmentSessions()->attach($this->getValidTreatmentSessions($request->treatment_session_ids));

            return response()->json(['package' => $package, 'message' => 'Package created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function calculateTotalPrice($treatmentSessionIds, $quantities): float
    {
        $totalPrice = 0;
        foreach ($treatmentSessionIds as $index => $treatmentSessionId) {
            $treatmentSession = TreatmentSession::find($treatmentSessionId);
            if ($treatmentSession) {
                $totalPrice += $treatmentSession->price * $quantities[$index];
            }
        }
        return $totalPrice;
    }

    private function getValidTreatmentSessions($treatmentSessionIds)
    {
        return TreatmentSession::whereIn('id', $treatmentSessionIds)->pluck('id')->toArray();
    }
}
