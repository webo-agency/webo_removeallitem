<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
{*{if $cart.products_count != "0"}*}
{*    <input type="submit" id="deleteallmyproductcart" value="Delete all items" name="Delete all items">*}
{*    <script type="text/javascript">*}
{*        $(document).ready(function () {*}
{*            $("#deleteallmyproductcart").click(function () {*}
{*                var url = "{$link->getModuleLink('webo_removeallitem', 'ajax', array())}";*}
{*                $.ajax({*}
{*                    type: 'POST',*}
{*                    url: url,*}
{*                    cache: false,*}
{*                    data: {*}
{*                        method: 'test',*}
{*                        ajax: true,*}
{*                        action: 'deleteitemfromcart',*}
{*                        cartid: {$cart_id}*}
{*                    },*}
{*                    success: function (result) {*}
{*                        console.log(result);*}
{*                    }*}
{*                });*}
{*            });*}
{*        });*}
{*    </script>*}
{*{/if}*}

{*{$abc|var_dump}*}

{$cart_id}
faewf