<?php

namespace App\Http\Controllers;

use App\Models\PedidoCovid;
use Illuminate\Http\Request;

class PedidoCovidController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCovid::orderBy('nro_pedido', 'desc')->paginate(30);
        return view('covid.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $siguiente = (PedidoCovid::max('nro_pedido') ?? 0) + 1;
        return view('covid.pedidos.form', compact('siguiente'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nro_pedido'      => 'required|integer|unique:pedidos_covid,nro_pedido',
            'radicado_paiweb' => 'nullable|string|max:100',
            'tipo_pedido'     => 'nullable|string|max:30',
            'observaciones'   => 'nullable|string',
            'temperatura'     => 'nullable|string|max:10',
        ]);
        PedidoCovid::create($data);
        return redirect()->route('pedidos-covid.index')->with('success', 'Radicado COVID registrado.');
    }

    public function show(string $id)
    {
        $pedido = PedidoCovid::with('movimientos')->findOrFail($id);
        return view('covid.pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        $pedido = PedidoCovid::findOrFail($id);
        return view('covid.pedidos.form', compact('pedido'));
    }

    public function update(Request $request, string $id)
    {
        $pedido = PedidoCovid::findOrFail($id);
        $data = $request->validate([
            'radicado_paiweb' => 'nullable|string|max:100',
            'tipo_pedido'     => 'nullable|string|max:30',
            'observaciones'   => 'nullable|string',
            'temperatura'     => 'nullable|string|max:10',
        ]);
        $pedido->update($data);
        return redirect()->route('pedidos-covid.index')->with('success', 'Radicado COVID actualizado.');
    }

    public function destroy(string $id)
    {
        PedidoCovid::findOrFail($id)->delete();
        return redirect()->route('pedidos-covid.index')->with('success', 'Radicado COVID eliminado.');
    }
}
