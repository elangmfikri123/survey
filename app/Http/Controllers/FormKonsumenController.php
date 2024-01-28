<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Customer;
use Illuminate\Http\Request;

class FormKonsumenController extends Controller
{
    public function formkonsumen($uuid)
    {
        $data = Customer::where('uuid', $uuid)->first();
        return view('formkonsumen', compact('data'));
    }
    public function postform(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);
        $existingForm = Form::where('customer_id', $customer->id)->first(); // Cek apakah formulir untuk customer tersebut sudah ada atau tidak
        if ($existingForm) {                                                // Formulir sudah ada, tidak perlu membuat baru, cukup perbarui jawaban
            $existingForm->update([
                'jawaban_1' => request('jawaban_1'),
                'jawaban_1a' => request('jawaban_1a'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => implode(',', request('jawaban_4')),
                'jawaban_5' => request('jawaban_5'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        } else {
            Form::create([                                                      // Formulir belum ada, buat formulir baru
                'customer_id' => $customer->id,
                'jawaban_1' => request('jawaban_1'),
                'jawaban_1a' => request('jawaban_1a'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => implode(',', request('jawaban_4')),
                'jawaban_5' => request('jawaban_5'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        }
    }
}
