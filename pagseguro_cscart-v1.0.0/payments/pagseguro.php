<?php 
include ('pagseguro/pgs.php');
include ('pagseguro/tratadados.php');

// Criando um novo carrinho
$pgs = new pgs(array(
    'email_cobranca'  => $processor_data['params']['email'],
    'tipo'            => 'CP',
    'tipo_frete'      => $processor_data['params']['tipo_frete'],
    'ref_transacao'   => $order_info['order_id'],
));

list($telefone_ddd, $telefone) = trataTelefone($order_info['phone']);

$pgs->cliente(array(
    'nome'    => $order_info['s_firstname']." ".$order_info['s_lastname'],
    'cep'     => $order_info['s_zipcode'],
    'end'     => $order_info['s_address'],
    'num'     => $order_info[''],
    'compl'   => $order_info['s_address_2'],
    'cidade'  => $order_info['s_city'],
    'uf'      => $order_info[''],
    'pais'    => $order_info[''],
    'ddd'     => $telefone_ddd,
    'tel'     => $telefone,
    'email'   => $order_info['email'],
));

$pedido = array();
foreach ($order_info['items'] as $item) {
    $pedido[] = array(
        'id'            => $item['item_id'],
        'quantidade'    => $item['amount'],
        'valor'         => $item['subtotal'],
        'descricao'     => strip_tags($item['product']),
    );
}

$extra = array (
    'Frete'        => $order_info['shipping_cost'],
    'Outras taxas' => $order_info['tax_value'],
);

foreach($extra as $k => $v){
    if(!$v) continue;
    $pedido[] = array(
        'id'            => $order_info['order_id'],
        'quantidade'    => 1,
        'valor'         => $v,
        'descricao'     => $k,
    );
}

$pgs->adicionar($pedido);

echo  <<<EOT
    <html><head><title></title></head>
    <body onLoad="document.forms[0].submit();">
    {$pgs->mostra(array('show_submit'=>false, 'print'=>false))}
    </body></html>
EOT;

?>
