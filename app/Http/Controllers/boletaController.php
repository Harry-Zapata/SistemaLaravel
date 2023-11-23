<?php

namespace App\Http\Controllers;

use App\Models\boleta;
use App\Models\cliente;
use App\Models\detalleBoleta;
use App\Models\empleado;
use App\Models\producto;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class boletaController extends Controller
{
    public function index()
    {
        $boletas = boleta::all();
        $clientes = cliente::all();
        $empleado = empleado::all();
        $detalle = detalleBoleta::all();
        $boletas = $boletas->map(function ($boletas) use ($clientes, $empleado) {
            //$boletas->estado_boleta = $boletas->estado_boleta ? 'Pagada' : 'Pendiente';
            $boletas->cliente_id = $clientes->find($boletas->cliente_id)->nombres . ' ' . $clientes->find($boletas->cliente_id)->apellidos;
            $boletas->cod_empleado = $empleado->find($boletas->cod_empleado)->nombres . ' ' . $empleado->find($boletas->cod_empleado)->apellidos;

            // Verificar si hay detalles para la boleta
            $detallesCount = DetalleBoleta::where('num_boleta', $boletas->id)->count();

            // Agregar propiedad anulado según la cantidad de detalles
            $boletas->estado_boleta = $detallesCount == 0 ? 'Anulada' : 'Pagada';
            return $boletas;
        });
        return view('admin.boletas.home', compact('boletas'));
    }

    public function show($id)
    {
        $boleta = boleta::find($id);
        $clientes = cliente::all();
        $empleado = empleado::all();
        $productos = producto::all();
        $detalle = detalleBoleta::where('num_boleta', $boleta->id)->get();

        $customer = new Buyer([
            'name'          => $clientes->find($boleta->cliente_id)->nombres . ' ' . $clientes->find($boleta->cliente_id)->apellidos,
            'custom_fields' => [
                'email' => $clientes->find($boleta->cliente_id)->email,
            ],
        ]);

        $seller = new Buyer([
            'name'          => $empleado->find($boleta->cod_empleado)->nombres . ' ' . $empleado->find($boleta->cod_empleado)->apellidos,
            'custom_fields' => [
                'email' => $empleado->find($boleta->cod_empleado)->email,
            ],
        ]);

        $items = [];

        foreach ($detalle as $value) {
            $product = $productos->find($value->id_prod);

            $items[] = (new InvoiceItem())
                ->title($product->descripcion)
                ->pricePerUnit($value->precio)
                ->quantity($value->cantidad);
        }

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($seller)
            ->addItems($items)
            ->serialNumberFormat($id)
            ->taxRate(0) // Ajusta el porcentaje de impuestos según tu lógica
            ->currencySymbol('S/') // Símbolo de moneda
            ->currencyCode('PEN'); // Código de moneda

        return $invoice->stream();
    }
}
