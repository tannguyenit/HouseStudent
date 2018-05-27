<?php
namespace App\Traits;

trait ResponseTrait
{
    public function success($data, $code = 200)
    {
        return response()->json(
            [
                'status' => true,
                'data'   => $data,
                'error'  => [
                    'code'    => 0,
                    'message' => [],
                ],
            ]
        );
    }

    protected function error($message, $status = 400)
    {
        return response()->json(
            [
                'status' => false,
                'data'   => null,
                'error'  => [
                    'code'    => $status,
                    'message' => is_array($message) ? $message : [$message],
                ],
            ],
            $status
        );
    }

    protected function notFound()
    {
        return $this->error('RESOURCE_NOT_FOUND', 404);
    }

    protected function notAuthorize()
    {
        return $this->error('NOT_AUTHORIZE_FOR_THIS_URI', 401);
    }
}
