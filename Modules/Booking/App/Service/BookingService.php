<?php

namespace Modules\Booking\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\Booking\App\Http\Requests\BookingRequest;
use Modules\Booking\App\Models\Booking;
use Modules\Booking\App\resources\BookingResource;
use Modules\Package\App\Models\Package;
use Modules\Patients\App\Models\Patient;

class BookingService
{
    use erorr, success;

    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = BookingResource::collection(Booking::get());
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(BookingRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {

            $booking = $request->validated();
            $package = Package::find($booking['package_id']);
            if (!$package) {
                throw new \Exception('Package not found.');
            }
            $patient = Patient::find($booking['patient_id']);
            if (!$patient) {
                throw new \Exception('Patient not found.');
            }
            $totalPaid = $request->paid;
            $packagePrice = $package->total_price;
            $rest = max($packagePrice - $totalPaid, 0);

            $data = Booking::create([
                'package_id' => $booking['package_id'],
                'patient_id' => $booking['patient_id'],
                'package_price' => $packagePrice,
                'paid' => $booking['paid'],
                'rest' => $rest
            ]);
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }


    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Booking::find($id);
            return $this->successResponse(new BookingResource($data), 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Booking = Booking::findOrFail($id);
            $Booking->update($data);
            return $this->successResponse(new BookingResource($data), 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Booking::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new BookingResource($data), 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
