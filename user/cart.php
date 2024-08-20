<div class="container">
    <h2>Shopping Cart</h2>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="10%">

                    </th>
                    <th width="10%">Dish</th>
                    <th width="10%">Price</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">SubTotal</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                                <tr>
                    <td>
                                                <img class="" width="70" src="http://localhost/foodienator/public/uploads/dishesh/thumb/igcsan.jpg">
                    </td>
                    <td>Grilled Cheese Sandwich</td>
                    <td>$6</td>
                    <td><input type="number" class="form-control text-center" value="3" onchange="updateCartItem(this, 'c4ca4238a0b923820dcc509a6f75849b')">
                    </td>
                    <td>$18</td>
                    <td>
                        <a href="http://localhost/foodienator/cart/removeItem/c4ca4238a0b923820dcc509a6f75849b" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 84V56c0-13.3 10.7-24 24-24h112l9.4-18.7c4-8.2 12.3-13.3 21.4-13.3h114.3c9.1 0 17.4 5.1 21.5 13.3L312 32h112c13.3 0 24 10.7 24 24v28c0 6.6-5.4 12-12 12H12C5.4 96 0 90.6 0 84zm416 56v324c0 26.5-21.5 48-48 48H80c-26.5 0-48-21.5-48-48V140c0-6.6 5.4-12 12-12h360c6.6 0 12 5.4 12 12zm-272 68c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208z"></path></svg><!-- <i class="fas fa-trash-alt"></i> --></a>
                    </td>
                </tr>
                                <tr>
                    <td>
                                                <img class="" width="70" src="http://localhost/foodienator/public/uploads/dishesh/thumb/hmbrger.jpg">
                    </td>
                    <td>Ham Burger</td>
                    <td>$4</td>
                    <td><input type="number" class="form-control text-center" value="2" onchange="updateCartItem(this, 'a87ff679a2f3e71d9181a67b7542122c')">
                    </td>
                    <td>$8</td>
                    <td>
                        <a href="http://localhost/foodienator/cart/removeItem/a87ff679a2f3e71d9181a67b7542122c" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 84V56c0-13.3 10.7-24 24-24h112l9.4-18.7c4-8.2 12.3-13.3 21.4-13.3h114.3c9.1 0 17.4 5.1 21.5 13.3L312 32h112c13.3 0 24 10.7 24 24v28c0 6.6-5.4 12-12 12H12C5.4 96 0 90.6 0 84zm416 56v324c0 26.5-21.5 48-48 48H80c-26.5 0-48-21.5-48-48V140c0-6.6 5.4-12 12-12h360c6.6 0 12 5.4 12 12zm-272 68c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208z"></path></svg><!-- <i class="fas fa-trash-alt"></i> --></a>
                    </td>
                </tr>
                                            </tbody>
            <tfoot>
                <tr>
                    <td><a href="http://localhost/foodienator/restaurant" class="btn btn-sm btn-warning"><svg class="svg-inline--fa fa-angle-left fa-w-8" aria-hidden="true" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path></svg><!-- <i class="fas fa-angle-left"></i> --> Continue Ordering</a></td>
                    <td colspan="3"></td>
                                        <td class="text-left">Grand Total: <b>$26</b></td>
                    <td><a href="http://localhost/foodienator/checkout" class="btn btn-sm btn-success btn-block">Checkout <svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg><!-- <i class="fas fa-angle-right"></i> --></a></td>
                                    </tr>
            </tfoot>
        </table>
    </div>
</div>