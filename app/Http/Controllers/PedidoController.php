<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderBy('nro_pedido', 'desc')->paginate(30);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $siguiente = (Pedido::max('nro_pedido') ?? 0) + 1;
        return view('pedidos.form', compact('siguiente'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nro_pedido'      => 'required|integer|unique:pedidos,nro_pedido',
            'radicado_paiweb' => 'nullable|string|max:100',
            'tipo_pedido'     => 'nullable|string|max:30',
            'observaciones'   => 'nullable|string',
            'temperatura'     => 'nullable|string|max:10',
        ]);

        Pedido::create($data);
        return redirect()->route('pedidos.index')->with('success', 'Radicado PAIWeb registrado.');
    }

    public function show(string $id)
    {
        $pedido = Pedido::with('movimientos')->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.form', compact('pedido'));
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);
        $data = $request->validate([
            'radicado_paiweb' => 'nullable|string|max:100',
            'tipo_pedido'     => 'nullable|string|max:30',
            'observaciones'   => 'nullable|string',
            'temperatura'     => 'nullable|string|max:10',
        ]);
        $pedido->update($data);
        return redirect()->route('pedidos.index')->with('success', 'Radicado actualizado.');
    }

    public function destroy(string $id)
    {
        Pedido::findOrFail($id)->delete();
        return redirect()->route('pedidos.index')->with('success', 'Radicado eliminado.');
    }
}
