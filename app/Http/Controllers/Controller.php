<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @SWG\Swagger(
     *     basePath="/api/v1",
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="This is my website cool API",
     *         description="Api description...",
     *         termsOfService="",
     *         @SWG\Contact(
     *             email="contact@mysite.com"
     *         ),
     *         @SWG\License(
     *             name="Private License",
     *             url="URL to the license"
     *         )
     *     ),
     *     @SWG\ExternalDocumentation(
     *         description="Find out more about my website",
     *         url="http..."
     *     )
     * )
     */
}
