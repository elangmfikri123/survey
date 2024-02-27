<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormHc;
use App\Models\FormcHc;
use App\Models\Customer;
use App\Models\CustomerHc;
use App\Models\CustomercHc;
use Illuminate\Http\Request;

class FormKonsumenController extends Controller
{
    //FORMULIR AWARENESS CONTACT CENTER
    public function formkonsumen($uuid)
    {
        $data = Customer::where('uuid', $uuid)->first();
        if (!$data) {
            return view('erorr.404');
        }
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
                'jawaban_4' => request('jawaban_4') ? implode(',', request('jawaban_4')) : null, // Periksa apakah pertanyaan 4 dijawab
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
                'jawaban_4' => request('jawaban_4') ? implode(',', request('jawaban_4')) : null, // Periksa apakah pertanyaan 4 dijawab
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
    //FORMULIR AWARENESS HONDA CARE
    public function formhc($uuid)
    {
        $data = CustomerHc::where('uuid', $uuid)->first();
        if (!$data) {
            return view('erorr.404');
        }
        return view('formhc', compact('data'));
    }
    public function postformhc(Request $request)
    {
        $customer = CustomerHc::findOrFail($request->customer_id);
        $existingForm = FormHc::where('customer_hc_id', $customer->id)->first(); // Cek apakah formulir untuk customer tersebut sudah ada atau tidak
        if ($existingForm) {                                                // Formulir sudah ada, tidak perlu membuat baru, cukup perbarui jawaban
            $existingForm->update([
                'jawaban_1' => request('jawaban_1'),
                'jawaban_1a' => request('jawaban_1a'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => request('jawaban_4') ? implode(',', request('jawaban_4')) : null, // Periksa apakah pertanyaan 4 dijawab
                'jawaban_5' => request('jawaban_5'),
                'jawaban_5a' => request('jawaban_5a'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
                'jawaban_11' => request('jawaban_11'),
                'jawaban_12' => request('jawaban_12'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        } else {
            FormHc::create([                                                      // Formulir belum ada, buat formulir baru
                'customer_hc_id' => $customer->id,
                'jawaban_1' => request('jawaban_1'),
                'jawaban_1a' => request('jawaban_1a'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => request('jawaban_4') ? implode(',', request('jawaban_4')) : null, // Periksa apakah pertanyaan 4 dijawab
                'jawaban_5' => request('jawaban_5'),
                'jawaban_5a' => request('jawaban_5a'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
                'jawaban_11' => request('jawaban_11'),
                'jawaban_12' => request('jawaban_12'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        }
    }
    //FORMULIR CSAT HONDA CARE
    public function formcsathc($uuid)
    {
        $data = CustomercHc::where('uuid', $uuid)->first();
        if (!$data) {
            return view('erorr.404');
        }
        return view('formcsathc', compact('data'));
    }
    public function postformcsat(Request $request)
    {
        $customer = CustomercHc::findOrFail($request->customer_id);
        $existingForm = FormcHc::where('customerc_hc_id', $customer->id)->first(); // Cek apakah formulir untuk customer tersebut sudah ada atau tidak
        if ($existingForm) {                                                // Formulir sudah ada, tidak perlu membuat baru, cukup perbarui jawaban
            $existingForm->update([
                'jawaban_1' => request('jawaban_1'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => request('jawaban_4'),
                'jawaban_5' => request('jawaban_5'),
                'jawaban_5a' => request('jawaban_5a'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
                'jawaban_11' => request('jawaban_11'),
                'jawaban_12' => request('jawaban_12'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        } else {
            FormcHc::create([                                                      // Formulir belum ada, buat formulir baru
                'customerc_hc_id' => $customer->id,
                'jawaban_1' => request('jawaban_1'),
                'jawaban_2' => request('jawaban_2'),
                'jawaban_3' => request('jawaban_3'),
                'jawaban_4' => request('jawaban_4'),
                'jawaban_5' => request('jawaban_5'),
                'jawaban_5a' => request('jawaban_5a'),
                'jawaban_6' => request('jawaban_6'),
                'jawaban_7' => request('jawaban_7'),
                'jawaban_8' => request('jawaban_8'),
                'jawaban_9' => request('jawaban_9'),
                'jawaban_10' => request('jawaban_10'),
                'jawaban_11' => request('jawaban_11'),
                'jawaban_12' => request('jawaban_12'),
            ]);
            $customer->status = true; // Ubah status menjadi Terisi
            $customer->save();
            return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
        }
    }
}
