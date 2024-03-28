<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Client;
use App\Models\AccountType;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      title="API de gestion des comptes bancaires",
 *      version="1.0.0",
 *      description="Ceci est une API pour gérer les comptes bancaires.",
 *      @OA\Contact(
 *          email="contact@exemple.com",
 *          name="Nom du contact"
 *      )
 * ),
 * @OA\Schema(
 *     schema="Account",
 *     title="Account",
 *     description="Account object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the account"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the account"
 *     )
 * )
 */
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
      * @OA\Get(
     *      path="/accounts",
     *      operationId="getAccountsList",
     *      tags={"Accounts"},
     *      summary="Get list of accounts",
     *      description="Returns list of accounts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Account")
     *          )
     *      )
     * )
     */
     public function index()
    {

        $accounts = Account::with('client','accountType')->get();
        return view('accounts.index', compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
 *     path="/accounts",
 *     operationId="createAccount",
 *     tags={"Accounts"},
 *     summary="Create a new account",
 *     description="Creates a new account with the provided data",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "balance"},
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the account"
 *             ),
 *             @OA\Property(
 *                 property="balance",
 *                 type="number",
 *                 format="float",
 *                 description="Initial balance of the account"
 *             ),
 *             @OA\Property(
 *                 property="currency",
 *                 type="string",
 *                 description="Currency of the account"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Account created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="ID of the newly created account"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the newly created account"
 *             ),
 *             @OA\Property(
 *                 property="balance",
 *                 type="number",
 *                 format="float",
 *                 description="Initial balance of the newly created account"
 *             ),
 *             @OA\Property(
 *                 property="currency",
 *                 type="string",
 *                 description="Currency of the newly created account"
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
    public function create()
    {
        //

        $clients = Client::all();
        $account_types = AccountType::all();
        return view('accounts.create' ,compact('clients'  , 'account_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $account = new Account();
            $account->solde = $request-> solde;
            $account->client_id = $request-> client_id;
            $account->account_type_id = $request->account_type_id;

            $account->save();

        return redirect()->route('account.index')->with('success',' account ajoute');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Get(
 *     path="/accounts/{id}",
 *     operationId="getAccountById",
 *     tags={"Accounts"},
 *     summary="Get account details",
 *     description="Returns account details by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the account",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="ID of the account"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the account"
 *             ),
 *             @OA\Property(
 *                 property="balance",
 *                 type="number",
 *                 format="float",
 *                 description="Balance of the account"
 *             ),
 *             @OA\Property(
 *                 property="currency",
 *                 type="string",
 *                 description="Currency of the account"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Account not found"
 *     )
 * )
     */
    public function show($id)
    {
        //
        $accounts = Account::find($id);
        return  view ('accounts.show', compact ('accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Put(
 *     path="/accounts/{id}",
 *     operationId="editAccount",
 *     tags={"Accounts"},
 *     summary="Edit an existing account",
 *     description="Edits an existing account with the provided data",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the account",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "balance"},
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the account"
 *             ),
 *             @OA\Property(
 *                 property="balance",
 *                 type="number",
 *                 format="float",
 *                 description="Balance of the account"
 *             ),
 *             @OA\Property(
 *                 property="currency",
 *                 type="string",
 *                 description="Currency of the account"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Account updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 format="int64",
 *                 description="ID of the updated account"
 *             ),
 *             @OA\Property(
 *                 property="name",
 *                 type="string",
 *                 description="Name of the updated account"
 *             ),
 *             @OA\Property(
 *                 property="balance",
 *                 type="number",
 *                 format="float",
 *                 description="Balance of the updated account"
 *             ),
 *             @OA\Property(
 *                 property="currency",
 *                 type="string",
 *                 description="Currency of the updated account"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Account not found"
 *     )
 * )
     */
    public function edit($id)
    {
        //
        $account = Account::find($id);
        return view('accounts.edit' ,compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $account = Account::find($id);
        $account-> solde = $request-> solde;
        $account-> client_id = $request-> client_id;
        $client-> account_type_id = $request-> account_type;
        $client->update();
        return redirect()->route('account.index')->with('success',' account MAJ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Delete(
 *     path="/accounts/{id}",
 *     operationId="deleteAccount",
 *     tags={"Accounts"},
 *     summary="Delete an existing account",
 *     description="Deletes an existing account",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the account",
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Account deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Account not found"
 *     )
 * )
     */
    public function destroy($id)
    {
        //
        $account = Account::find($id);
        $account -> delete();
        return redirect()->back()->with('succcess','account deleted');

    }
}
