<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound( $message = 'not found')
    {
        return $this->setStatusCode( 404 )->responsError($message);
    }

    /**
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responsError( $message)
    {
        return $this->response( [
            'status' => 'failed',
            'error'  => [
                'code' => $this->getStatusCode(),
                'message' => $message
            ]
        ] );
    }

    /**
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response( $data)
    {
        return \Response::json(array_merge( ['code'=>$this->getStatusCode() ],$data));
    }

    /**
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode( $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
