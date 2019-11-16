<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{

    /**
     * @SWG\Post(
     *      path="/contact",
     *      summary="Contact form",
     *      description="Contact form for users",
     *     @SWG\Parameter(
     *         name="name",
     *         in="formData",
     *         type="string",
     *         description="User name",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         type="string",
     *         description="The email for contact",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="subject",
     *         in="formData",
     *         type="string",
     *         description="Subject of mail",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="message",
     *         in="formData",
     *         type="string",
     *         description="Message which user sends",
     *         required=true,
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Login with jwt.
     * @param Request $request
     * @return JsonResponse
     */
    public function contact(Request $request)
    {
        $data['name'] = $request->get('name');
        $data['email'] = 'sasa96.sladic@gmail.com';
        $data['email_from'] = $request->get('email');
        $data['subject'] = $request->get('subject');
        $data['content'] = $request->get('message');

        send_email('admin.email.contact_form_email', $data);


        return response()->json('Success', 200);
    }

}
