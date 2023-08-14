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
        $info->youtube = $request->youtube;
        $info->lat = $request->latitude;
        $info->long = $request->longitude;
        $info->points_money = $request->points_money;
        $info->days_to_valid_marketer_money = $request->days_to_valid_marketer_money;
        $info->minimam_points_can_be_withdrawald = $request->minimam_points_can_be_withdrawald;
        $info->minimam_money_can_be_withdrawald = $request->minimam_money_can_be_withdrawald;
        $info->save();
        return redirect()->back()->with('success' , trans('settings.editing_success'));
    }

    
}
