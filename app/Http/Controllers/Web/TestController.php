<?php

namespace Vanguard\Http\Controllers\Web;
use CURLFile;
use GuzzleHttp\Client;
use Prestashop;
use Protechstudio\PrestashopWebService\Exceptions\PrestashopWebServiceException;
use Protechstudio\PrestashopWebService\PrestashopWebService;
use Vanguard\Http\Controllers\Controller;


class TestController extends Controller
{
    private $prestashop;

    public function __construct(PrestashopWebService $prestashop)
    {
        $this->prestashop = $prestashop;
    }

    public function index2()
    {

        $uri = 'https://infshop.co.uk';
        $key  = '4GGVV3237VW9MEXMX2T15W51UHLILHJW';

        $url = $uri . '/api/images/products/5';

        $client = new Client();
        $response = $client->request('POST', $url, [
            'auth' => ['4GGVV3237VW9MEXMX2T15W51UHLILHJW', ''],
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen('https://images.sello.io/products/acc/34511/492268792e10f958876b02d1ace5e9f55e299106.jpg', 'r'),
                    'headers'  => ['Content-Type' => 'image/jpg']
                ],
            ],
        ]);

        dd($response);
        $uri = 'https://infshop.co.uk';
        $key  = '4GGVV3237VW9MEXMX2T15W51UHLILHJW';

        $url = $uri . '/api/images/products/5';

        $client = new \GuzzleHttp\Client();
        $response =  $client->request('POST',
            'https://4GGVV3237VW9MEXMX2T15W51UHLILHJW@infshop.co.uk/api/images/products/5'
            , [
                'multipart' => [
                    [
                        'name'     => 'image',
                        'contents' => fopen('https://images.sello.io/products/acc/34511/492268792e10f958876b02d1ace5e9f55e299106.jpg', 'r'),
                        'headers'  => ['Content-Type' => 'image/jpg']
                    ],
                ],
            ]);

        return  json_decode($response->getBody()->getContents(), TRUE);


        $client = new Client();
        $response = $client->request('POST',$url, [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen('https://images.sello.io/products/acc/34511/492268792e10f958876b02d1ace5e9f55e299106.jpg', 'r'),
                    'headers'  => ['Content-Type' => 'image/jpg']
                ],
            ],
        ]);

        dd($response);


        $image_path = 'E:\wamp64\www\Laravel_Projects\book2\images\1.jpg';

        $url = 'https://abc.com';
        $key  = 'asdasdaseeeeeeee';

        $url = $url . '/api/images/products/5';

        $ch = curl_init($prefix.$domain.$relative);
        echo(curl_exec($ch));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:multipart/form-data','Expect:'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, $key.':');
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => new CurlFile($image_path)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return ($result);

        dd('ok now...!');

//        try {
//            $webService = new PrestaShopWebservice('https://infshop.co.uk', '4GGVV3237VW9MEXMX2T15W51UHLILHJW', true);
//
//            // call to retrieve the blank schema
//            $blankXml = $webService->get(['url' => 'https://infshop.co.uk/api/customers?schema=blank']);
//
//            $customerFields = $blankXml->customer->children();
//            $customerFields->firstname = 'John';
//            $customerFields->lastname = 'DOE';
//            $customerFields->email = 'john.doe@unknown.com';
//            $customerFields->password = 'password1234';
//
//            $createdXml = $webService->add([
//                'resource' => 'customers',
//                'postXml' => $blankXml->asXML(),
//            ]);
//
//            $newCustomerFields = $createdXml->customer->children();
//
//            echo 'Customer created with ID ' . $newCustomerFields->id . PHP_EOL;
//
//            dd('d');
//
//
//        } catch (PrestaShopWebserviceException $ex) {
//            // Shows a message related to the error
//            echo 'Other error: <br />' . $ex->getMessage();
//        }


//        try {
//            // creating webservice access
//            $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);
//
//            // call to retrieve customer with ID 2
//            $xml = $webService->get([
//                'resource' => 'customers',
//                'id' => 2, // Here we use hard coded value but of course you could get this ID from a request parameter or anywhere else
//            ]);
//        } catch (PrestaShopWebserviceException $ex) {
//            // Shows a message related to the error
//            echo 'Other error: <br />' . $ex->getMessage();
//        }



        $image_path = 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg';
        $url = 'https://infshop.co.uk';
        $key  = '4GGVV3237VW9MEXMX2T15W51UHLILHJW';
        $urlImage = 'https://infshop.co.uk/api/images/products/5';


        try {

            // creating webservice access ?output_format=JSON
            $webService = new PrestaShopWebservice('https://infshop.co.uk', '4GGVV3237VW9MEXMX2T15W51UHLILHJW', true);

            $xml = $webService->get(['resource' => 'customers']);

            $resources = $xml->customers->children();
            foreach ($resources as $resource) {
                $attributes = $resource->attributes();
                $resourceId = $attributes['id'];
                // From there you could, for example, use th resource ID to call the webservice to get its details
            }

            dd($xml);
            try {

                $opt = array('resource' => 'products');
                $xml = $webService->get(array('url' => 'https://infshop.co.uk' . '/api/products?schema=blank'));
                $resource_product = $xml->children()->children();


                unset($resource_product->id);
                unset($resource_product->position_in_category);
                unset($resource_product->manufacturer_name);
                unset($resource_product->id_default_combination);
                unset($resource_product->associations);

                $resource_product->id_shop = 1;
                $resource_product->minimal_quantity = 1;
                $resource_product->available_for_order = 1;
                $resource_product->show_price = 1;
                //$resource_product->quantity = 100;
                $resource_product->id_category_default = 3;
                $resource_product->price = 12.23;
                $resource_product->active = 1;
                $resource_product->visibility = 'both';

                $resource_product->name->language[0][0] = 'blabla';

                $resource_product->description->language[0][0] = '<p>blabla</p>';

                $resource_product->description_short->language[0][0] = 'blabla';

                $resource_product->associations = '';

                $resource_product->state = 1;

//                // CHAPTER 1 // ADDING NEW PRODUCTS... IN FEW WAYS -> NO SUCCESS!!
//                $resource_product->addChild('associations')->addChild('categories')->addChild('category')->addChild('id', 6);
//                $resource_product->addChild('associations')->addChild('categories')->addChild('category')->addChild('id', '7');
//                $resource_product->addChild('associations')->addChild('categories')->addChild('category')->addChild('id', "8");
//                //$resource_product->associations->categories->category->addChild('id', 5);

                $opt = array('resource' => 'products');


                $opt['postXml'] = $xml->asXML();


                $xml = $webService->add($opt);

                $id = $xml->product->id;
                echo "<p>PRODUCTO " . $id . " AÑADIDO</p>";

                dd($id);
                dd('d');
                //set_product_quantity(100,$id,);

                // CHAPTER 2 // UPDATING PRODUCT -> NO SUCCESS!!

                $new_product_categories = array(29, 30, 31); // List of categories to be linked to product
                $xml = $webService->get(array('resource' => 'products', 'id' => $id));
                $product = $xml->children()->children();

                // Unset fields that may not be updated
                unset($product->manufacturer_name);
                unset($product->quantity);

                // Remove current categories
                unset($product->associations->categories);

                // Create new categories
                $categories = $product->associations->addChild('categories');

                foreach ($new_product_categories as $id_category) {
                    $category = $categories->addChild('category');
                    $category->addChild('id', $id_category);
                }

                $xml_response = $webService->edit(array('resource' => 'products', 'id' => $id, 'putXml' => $xml->asXML()));

                echo "<p>PRODUCTO " . $xml_response->product->id. "  ACTUALIZADO CON CATEGORIAS</p>";


            } catch (PrestaShopWebserviceException $e) {
                // Here we are dealing with errors
                $trace = $e->getTrace();

                dd($e);
                if ($trace[0]['args'][0] == 404) echo 'Bad ID';
                else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
                else echo '<b>ERROR:</b> ' . $e->getMessage();
            }






            // call to retrieve all clients
            $xml = $webService->get(array('resource' => 'products'));

            dd($xml);
        }
        catch (PrestaShopWebserviceException $ex) {
            // Shows a message related to the error
            dd('Other error: <br />' . $ex->getMessage());
        }

        $xmlSchema = Prestashop::getSchema('categories'); //returns a SimpleXMLElement instance with the desired schema

        $data=[
            'name'=>'Clothes123',
            'link_rewrite'=>'clothes123',
            'active'=>true
        ];

        $postXml=Prestashop::fillSchema($xmlSchema,$data);

        //The xml is now ready for being sent back to the web service to create a new category

        $response = Prestashop::add(['resource'=>'categories','postXml'=>$postXml->asXml()]);

        dd($response);
    }

    public function categoriesSection()
    {

        try {
            // creating webservice access
            $webService = new PrestaShopWebservice('https://infshop.co.uk', '4GGVV3237VW9MEXMX2T15W51UHLILHJW', false);

            // call to retrieve all clients
            $xml = $webService->get(array('resource' => 'categories'));

            dd($xml);
        }
        catch (PrestaShopWebserviceException $ex) {
            // Shows a message related to the error
            dd('Other error: <br />' . $ex->getMessage());
        }

        $xmlSchema = Prestashop::getSchema('categories'); //returns a SimpleXMLElement instance with the desired schema

        $data = [
            'name'=>'Clothes',
            'link_rewrite'=>'clothes',
            'active'=>true
        ];

        #

        $postXml=Prestashop::fillSchema($xmlSchema,$data);

        //The xml is now ready for being sent back to the web service to create a new category

        $response=Prestashop::add([ 'resource'=>'categories', 'postXml'=> $postXml->asXml()]);

        dd($response);
    }

    public function AddProduct($root_path, $authentication_key, $id, $name, $desc, $cat, $qta, $price){
        try{
            $webService = CreateWebServer($root_path,$authentication_key);
            $xml = $webService->get(array('resource' => 'products?schema=synopsis'));
        }catch(PrestashopWebserviceException $ex){
            echo $ex->getMessage();
            return -1;
        }


        $resources = $xml->children()->children();

        unset($resources->position_in_category);
        unset($resources->manufacturer_name);

        unset($resources->position_in_category);
        unset($resources->manufacturer_name);
        unset($resources->id_default_combination);
        unset($resources->quantity);

        $resources->price = floatval($price);
        $resources->quantity = intval($qta);
        $resources->link_rewrite->language[0][0] = str_replace(' ','-',$name);
        $resources->name->language[0][0] = $name;
        $resources->description->language[0][0] = $desc;

        $node= dom_import_simplexml($resources->description->language[0][0]);
        $no = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($desc));

        $resources->associations = '';

        //echo $xml->asXML();
        try{
            $opt = array('resource' => 'products');
            $opt['postXml'] = $xml->asXML();
            $xml = $webService->add($opt);
        }
        catch(PrestaShopWebserviceException $ex)
        {
            echo $ex->getMessage();
        }
        return 0;
    }
}
