<?php

namespace Webkul\Campaign\Repositories;

use campaign\Events\ManageCampaignEvent;
use Webkul\Campaign\Models\Campaign;

class CampaignRepository
{
    public function show()
    {

    }

    public function create(array $fields)
    {
        $campaign = Campaign::create($fields);

//        ManageCampaignEvent::dispatch($campaign,__FUNCTION__);
    }

    public function update(int $campaignId, array $fields)
    {
        $campaign = Campaign::firstOrFail($campaignId);

        $campaign->update($fields);

        ManageCampaignEvent::dispatch($campaign);
    }


    public function delete(int $campaignId)
    {
        $campaign = Campaign::destroy($campaignId);

        ManageCampaignEvent::dispatch($campaign,__FUNCTION__);
    }


}
