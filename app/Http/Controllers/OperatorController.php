<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OperatorController extends Controller
{
    /**
     * List all operators.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operators = Operator::all()->toArray();
        return array_reverse($operators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addOperator(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $status = 'Ativo';

        try {
            $operator = new Operator([
                'name'              => $name,
                'description'       => $description,
                'status'            => $status
            ]);
            $operator->save();

            return response()->json(
                [
                    'Message:'      =>'Operadora cadastrada com sucesso',
                    'Status'        => 200
                ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'Message:'      =>'Operadora não cadastrada',
                    'Error:'        => $e,
                    'Status'        => 500
                ]);
        }

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function findOperator($status)
    {
        try {
            // $operator = Operator::where('status',$status)->find();
            $operator = DB::table('operators')->where('status', $status)->get();
            return response()->json(
                [
                    'Message'      =>'Operadora encontrada',
                    'Object'       => $operator,
                    'Status'       => 200
                ]);

        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'Message:'      =>'Operadora não cadastrada',
                    'Error:'        => $e,
                    'Status'        => 500
                ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $operator = Operator::find($id);
            $operator->update($request->all());

            return response()->json(
                [
                    'Message'      =>'Operadora atualizada com sucesso',
                    'Status'       => 200
                ]);

        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    'Message:'      =>'Operador não foi atualizada',
                    'Error:'        => $e,
                    'Status'        => 500
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $operator = Operator::find($id);
        $operator->delete();

        return response()->json(
            [
                'Message'      =>'Operadora deletada com sucesso',
                'Status'       => 200
            ]);
    }

     /**
     * Disable the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function disable($id, $status)
    {
        //
        $operator = Operator::find($id);
        $operator->update('status',$status);

        return response()->json(
            [
                'Message'      =>'Operadora desativada com sucesso',
                'Status'       => 200
            ]);
    }
}
