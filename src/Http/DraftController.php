<?php

namespace OptimistDigital\NovaDrafts\Http;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use OptimistDigital\NovaDrafts\Models\Draft;

class DraftController extends Controller
{
    public function publishDraft($draftId, Request $request)
    {
        $resource_class = $request->input('class');
        $draft_to_publish = $resource_class::find($draftId);

        if (isset($draft_to_publish)) {
                $draft_to_publish->published = true;
                $draft_to_publish->preview_token = null;
                $draft_to_publish->save();
                return $draft_to_publish;
        }
        return $draft_to_publish;
    }

    public function unpublishDraft($draftId, Request $request)
    {
        $draftClass = $request->input('class');
        $draftToUnpublish = $draftClass::find($draftId);

        if (empty($draftToUnpublish)) return response()->json(['error' => 'model_not_found'], 404);

        $draftToUnpublish->published = false;
        $draftToUnpublish->preview_token = Str::random(20);
        $draftToUnpublish->save();

        return response('', 204);
    }
}
