<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
class SettingsController extends Controller
{
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $info = Settings::first();
        return view('dashboard.settings.edit', compact('info') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $info = Settings::first();
        $info->setTranslation('address' , 'ar' , $request->address['ar'] );
        $info->setTranslation('address' , 'en' , $request->address['en'] );
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->facebook = $request->facebook;
        $info->twitter = $request->twitter;
        $info->instgrame = $request->instgrame;
        $info->lat = $request->latitude;
        $info->long = $request->longitude;
        $info->save();
        return redirect()->back()->with('success' , trans('settings.editing_success'));
    }

   
}
