<div class="Polaris-DataTable data_table-M35">
    <div class="Polaris-DataTable__ScrollContainer data_tableM35">
        <table class="Polaris-DataTable__Table">
            <thead>
                <tr>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn Polaris-DataTable__Cell--header" scope="col">#</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">Name</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header " scope="col">Email</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header" scope="col">Country</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Total Orders</th><th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Last Order</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Created At</th>
                    <th data-polaris-header-cell="true" class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--header Polaris-DataTable__Cell--numeric" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if( !empty($customers) ) : ?>
                <?php $row  = $page+1; foreach($customers as $customer) : ?>
                <?php $name = $customer['first_name'] .' '. $customer['last_name']; ?>
                <tr class="Polaris-DataTable__TableRow">
                    <th class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn" scope="row"><?= $row; ?></th>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn"><?= $name; ?></td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--firstColumn"><?= $customer['email']; ?></td>
                    <?php $country = !empty($customer['default_address']['country']) ? $customer['default_address']['country'] : ''; ?>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop    Polaris-DataTable__Cell--firstColumn"><?= $country; ?></td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><?= $customer['orders_count']; ?></td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><?= $customer['last_order_name']; ?></td>
                    <?php $created_at = date("M d, Y H:i A", strtotime($customer['created_at'])); ?>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><?= $created_at; ?></td>
                    <td class="Polaris-DataTable__Cell Polaris-DataTable__Cell--verticalAlignTop Polaris-DataTable__Cell--numeric"><a href="javascript:void(0);" class="modal-btn" data-id="<?= $customer['id']; ?>" data-name="<?= $name; ?>" style="color: blue" >Wishlist</a></td>
                </tr>
                <?php $row++; endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="8" style="text-align: center"><strong>No Records Found</strong></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    
    function myFunction(id) {        
        $(".overlay_open").not("#"+id).hide();
        $("#"+id).toggle();
       // event.stopPropagation(); 
    }

    $('.actionfilter').click(function(event){
         event.stopPropagation(); 
    });

    $('body').click(function(){
        $(".overlay_open").hide();
    })
</script>
