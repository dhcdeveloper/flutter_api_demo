<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class Controller extends BaseController
{
    //

    protected function save_pagination_info($page_name, $multi = false)
    {
        if ($multi) {
            $page_input = request($page_name."_page_count");
        }
        else {
            $page_input = request("page_count");
        }

        if ($page_input) {
            // Session::put($page_name . '_page_count', $page_input);
            session([$page_name . '_page_count' => $page_input]);
        }
    }

    protected function get_page_count($page_name)
    {
        if (session($page_name . '_page_count')) {
            return session($page_name . '_page_count');
        } else {
            return 10;
        }
    }

    /**
     * 成功時のレスポンスを返却する
     *
     * @param array $params
     * @return JsonResponse
     */
    protected function successResponse($params = [])
    {
        return response()->json(
            [
                'response' => 1,
                'data' => $params,
            ],
            Response::HTTP_OK
        );
    }

    /**
     * エラー時のレスポンスを返却する
     *
     * @param string $message エラーメッセージ
     * @param int $status_code
     * @return JsonResponse
     */
    protected function errorResponse($message, $status_code = Response::HTTP_BAD_REQUEST)
    {
        $debug_trace = debug_backtrace();
        $caller = array_shift($debug_trace);
        $info = 'API error response. file:' . str_replace(app_path(), '', $caller['file']);
        $info .= ' L:' . $caller['line'];
        $info .= ' -> message:' . $message;
        logger()->info($info);

        return response()->json(
            [
                'response' => 0,
                'error_text' => $message
            ],
            $status_code
        );
    }
}
