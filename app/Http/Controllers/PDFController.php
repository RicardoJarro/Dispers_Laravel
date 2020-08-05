<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\TestMail;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');
    }

    public function guardarpdf(){

        $categorias = Category::all();
        $pdf = PDF::loadView('admin.category.pdfcategoryhorizontal',compact('categorias'));
    	Storage::disk('public')->put(date('Y-m-d-H-i-s').'-categoriashorizontal', $pdf);
    	return redirect()->back()->with('status', '¡PDF guardado correctamente!');
    }

    public function PDFCategoriasHorizontal(Request $request){
     
     $pedido=Order::with('order_details.product')->find(1);
     $fecha=Carbon::now()->toDateTimeString();
    //  $pdf = (\PDF::loadView('usuarios',compact('users')))->setPaper('a4','landscape');
    $pdf = (PDF::loadView('tienda.compra.factura_enviar',compact('pedido','fecha')))->setPaper('a4','landscape');

    // $categorias = Category::all();
    //  $pdf = PDF::loadView('admin.category.pdfcategoryhorizontal',compact('categorias'));
    
     //$usuario=$pedido->user;
     $data["email"]=$request->get("juanc.lazol@ucuenca.edu.ec");
     $data["client_name"]=$request->get("Juan");
     $data["subject"]=$request->get("Gracias por comprar");

         Mail::send('welcome', $data, function($message)use($data,$pdf) {
         $message->to("juanc.lazol@ucuenca.edu.ec", "Juan")
         ->subject("Gracias por comprar ")
         ->attachData($pdf->output(), "invoice.pdf");
         });
    
     if (Mail::failures()) {
          $this->statusdesc  =   "Error sending mail";
          $this->statuscode  =   "0";

     }else{

        $this->statusdesc  =   "Message sent Succesfully";
        $this->statuscode  =   "1";
     }
     return response()->json(compact('this'));
    //Mail::to('juandiego-271296@hotmail.es')->send(new TestMail());

    // return $pdf->setPaper('a4', 'landscape')->download('categoriashorizontal.pdf');
    
    }




    public function PDFCategorias(Request $request)
    {
     
        $categorias = Category::all();

        $pdf = PDF::loadView('admin.category.pdfcategory',compact('categorias'));
        return $pdf->download('categorias.pdf');
    }
}