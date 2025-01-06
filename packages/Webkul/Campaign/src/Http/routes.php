<?php

Route::group([
        'prefix'        => 'admin/campaign',
        'middleware'    => ['web', 'user']
    ], function () {

        Route::get('', 'Webkul\Campaign\Http\Controllers\CampaignController@index')->name('admin.campaign.index');
        Route::get('create', 'Webkul\Campaign\Http\Controllers\CampaignController@create')->name('admin.campaign.create');
        Route::get('edit/{id}', 'Webkul\Campaign\Http\Controllers\CampaignController@edit')->name('admin.campaign.edit');
        Route::post('update/{id}', 'Webkul\Campaign\Http\Controllers\CampaignController@update')->name('admin.campaign.update');
        Route::post('save', 'Webkul\Campaign\Http\Controllers\CampaignController@store')->name('admin.campaign.store');

        Route::post('mass-destroy', 'Webkul\Campaign\Http\Controllers\CampaignController@massDestroy')->name('admin.campaign.mass_delete');
        Route::middleware(['throttle:100,60'])->delete('{id}', 'Webkul\Campaign\Http\Controllers\CampaignController@destroy')->name('admin.campaign.delete');

});
