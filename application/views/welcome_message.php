<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter Shopping Cart!</h1>

	<div id="body">
		<?php echo form_open('Welcome/update_cart/'); ?>

			<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

			<tr>
			        <th>QTY</th>
			        <th>Item Description</th>
			        <th style="text-align:right">Item Price</th>
			        <th style="text-align:right">Sub-Total</th>
			</tr>

			<?php $i = 1; ?>

			<?php foreach ($this->cart->contents() as $items): ?>

			        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

			        <tr>
			                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
			                <td>
			                        <?php echo $items['name']; ?>

			                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

			                                <p>
			                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

			                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

			                                        <?php endforeach; ?>
			                                </p>
			                                
			                        <?php endif; ?>
			                        <p>
	                                <strong><a href="<?php echo base_url('Welcome/delete_cart/'.$items['rowid'])?>">Remove item</a></strong>
	                                </p>


			                </td>
			                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
			                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
			        </tr>

			<?php $i++; ?>

			<?php endforeach; ?>

			<tr>
			        <td colspan="2"> </td>
			        <td class="right"><strong>Total</strong></td>
			        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
			</tr>

			</table>

			<p><?php echo form_submit('', 'Update your Cart'); ?><a href="<?php echo base_url('Welcome/clear_cart/')?>">Clear cart</a></p>
			<p></p>
			<?php echo form_close()?>

		<div class="row">
			<div class="col-md-2">
				<div class="col-xs-4 col-sm-4 col-md-2 col-p-3">
					<form action="<?php echo base_url('Welcome/select_product_id')?>" method="post">
					
                    <div class="panel panel-bd product-panel select_product">
                        <div class="panel-body">
                            <img src="http://localhost/ecommerce_erp/my-assets/image/product/35b1606b29c067f89586ec1b7587042c.png" class="img-responsive" alt="" height="200" width="200">
                            <input type="hidden" name="select_product_id" class="select_product_id" value="15863815">
                            <input type="hidden" name="price" class="select_product_id" value="130.23">
                            Qnty <input type="text" name="qnty" class="select_product_id" >

                            <p>Price : $130.23</p>
                        </div>
                        <div class="">
                        	<button class="btn btn-warning" type="submit">Add to cart</button>
                        </div>
                    </div>
                    </form>
               	</div>
			</div>

			<div class="col-md-2">
				
               	<div class="col-xs-4 col-sm-4 col-md-2 col-p-3">
					<form action="<?php echo base_url('Welcome/select_product_id')?>" method="post">
					
                    <div class="panel panel-bd product-panel select_product">
                        <div class="panel-body">
                            <img src="http://localhost/ecommerce_erp/my-assets/image/product/35b1606b29c067f89586ec1b7587042c.png" class="img-responsive" alt="" height="200" width="200">
                            <input type="hidden" name="select_product_id" class="select_product_id" value="15863816">
                            <input type="hidden" name="price" class="select_product_id" value="500">
                            <input type="text" name="qnty" class="select_product_id" >
                        </div>
                        <div class="panel-footer">
                        	<button class="btn btn-warning" type="submit">Add to cart</button>
                        </div>
                    </div>
                    </form>
               	</div>
               
			</div>

			<div class="col-md-2">
				<div class="col-xs-4 col-sm-4 col-md-2 col-p-3">
					<form action="<?php echo base_url('Welcome/select_product_id')?>" method="post">
					
                    <div class="panel panel-bd product-panel select_product">
                        <div class="panel-body">
                            <img src="http://localhost/ecommerce_erp/my-assets/image/product/35b1606b29c067f89586ec1b7587042c.png" class="img-responsive" alt="" height="200" width="200">
                            <input type="hidden" name="select_product_id" class="select_product_id" value="15863817">
                            <input type="hidden" name="price" class="select_product_id" value="500">
                            <input type="text" name="qnty" class="select_product_id" >
                        </div>
                        <div class="panel-footer">
                        	<button class="btn btn-warning" type="submit">Add to cart</button>
                        </div>
                    </div>
                    </form>
               	</div>
			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

</body>
</html>