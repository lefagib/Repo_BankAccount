<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\AccountType;
use App\Models\Account;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Client",
 *     title="Client",
 *     description="Client object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the client"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the client"
 *     ),
 * )
 */


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *      path="/clients/{id}",
     *      operationId="getClientById",
     *      tags={"Clients"},
     *      summary="Get client details",
     *      description="Returns client details by ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Client ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Client")
     *      ),
     *
     *     @OA\Info(
     *      title="Nom de votre API",
     *      version="1.0.0",
     *      description="Description de votre API",
     *      @OA\Contact(
     *          email="contact@exemple.com",
     *          name="Nom du contact"
     *      )
     * ),
     *      @OA\Response(
     *          response=404,
     *          description="Client not found"
     *      )
     * ),
     */

    public function getAllClients(){

        $clients = Client::all();
        //dd( $clients);
        return view ('client.list', compact('clients'));
        //return view ('layout.main',compact('clients'));
    }
/**
 * @OA\Post(
 *     path="/clients",
 *     operationId="createClient",
 *     tags={"Clients"},
 *     summary="Create a new client",
 *     description="Creates a new client with the provided data",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email"},
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the client"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Email of the client"
 *             ),
 *             @OA\Property(
 *                 property="phone",
 *                 type="string",
 *                 description="Phone number of the client"
 *             ),
 *             @OA\Property(
 *                 property="address",
 *                 type="string",
 *                 description="Address of the client"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Client created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="ID of the newly created client"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the newly created client"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Email of the newly created client"
 *             ),
 *             @OA\Property(
 *                 property="phone",
 *                 type="string",
 *                 description="Phone number of the newly created client"
 *             ),
 *             @OA\Property(
 *                 property="address",
 *                 type="string",
 *                 description="Address of the newly created client"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Error message"
 *             ),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 description="Validation errors"
 *             )
 *         )
 *     )
 * )
 */
    public function create(){

       $clients = Client::all();
        //dd( $clients);
        return view ('client.create' ,compact('clients'));

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
      
     */
    public function show($id)
    {
        //
        $client = Client::find($id);

        return view('client.show' , compact('client'));
    }


    public function store(Request $request){
        $validate = $request->validate([
            'nom'=> 'required',
            'prenom'=> 'nullable',
            'adresse'=> 'required',
            'date_naissance'=> 'required',
            'CNI'=>'required'
        ]);
        //return view ('client.list');
        $client = new client();
            $client->nom = $request-> input('nom');
            $client->prenom = $request-> input('prenom');
            $client->adresse = $request-> input('adresse');
            $client->date_naissance = $request-> input('date_naissance');
            $client->CNI = $request-> input('CNI');
            $client->save();

        return redirect()->route('client.list')->with('success',' client ajoute');
    }

    /**
 * @OA\Delete(
 *     path="/clients/{id}",
 *     operationId="deleteClient",
 *     tags={"Clients"},
 *     summary="Delete an existing client",
 *     description="Deletes an existing client",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the client",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Client deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client not found"
 *     )
 * )
 */
       public function delete(int $id){

             $client = Client::find($id);
             $client -> delete();
             return redirect()->back()->with('succcess','client supprime');
        }
        /**
 * @OA\Put(
 *     path="/clients/{id}",
 *     operationId="editClient",
 *     tags={"Clients"},
 *     summary="Edit an existing client",
 *     description="Edits an existing client with the provided data",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the client",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email"},
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the client"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Email of the client"
 *             ),
 *             @OA\Property(
 *                 property="phone",
 *                 type="string",
 *                 description="Phone number of the client"
 *             ),
 *             @OA\Property(
 *                 property="address",
 *                 type="string",
 *                 description="Address of the client"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Client updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="ID of the updated client"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the updated client"
 *             ),
 *             @OA\Property(
 *                 property="email",
 *                 type="string",
 *                 format="email",
 *                 description="Email of the updated client"
 *             ),
 *             @OA\Property(
 *                 property="phone",
 *                 type="string",
 *                 description="Phone number of the updated client"
 *             ),
 *             @OA\Property(
 *                 property="address",
 *                 type="string",
 *                 description="Address of the updated client"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client not found"
 *     ),
 * )
 */
       public function edite(int $id){

            $client = Client::find($id);
          return view('client.edit' ,compact('client'));
            //return redirect()->back();
       }



      public function update(Request $request ,int $id){

        $client = Client::find($id);
        $client-> nom = $request-> input('nom');
        $client-> prenom = $request-> input('prenom');
        $client-> adresse = $request-> input('adresse');
        $client-> date_naissance = $request-> date_naissance;
        $client-> CNI = $request-> input('CNI');
        $client->update();
        return redirect()->route('client.list')->with('success',' client MAJ');

   }


    }

