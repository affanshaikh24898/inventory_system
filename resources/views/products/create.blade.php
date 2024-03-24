@extends('auth.layouts')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>
                Create Product and Lots 
                <a href="{{ route('products.index') }}" class="btn btn-primary">back</a>
            </h2>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div><br>

                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" id="price" class="form-control" min="1" required>
                </div><br>

                <div class="form-group">
                    <div id="lots-container">
                        <!-- Existing question -->
                        <div class="lots" style="border:1px solid gray;padding:5px;margin-bottom:15px;">
                            <label for="lot_title">Lot title</label>
                            <input type="text" name="lot[0][lot_title]" class="form-control" required>
                            <label for="lot_qty">Lot Qty</label>
                            <input type="number" name="lot[0][lot_qty]" class="form-control" min="1" required>
                            <label for="expiration_date">Expiration Date</label>
                            <input type="date" name="lot[0][expiration_date]" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>  
                        </div>
                    </div>
                </div>
                
                {{-- <button type="button" id="add-lot" class="btn btn-secondary">Add Another Lot</button> --}}
                <button type="submit" class="btn btn-primary">Create Product and Lots</button>
                <button class="btn btn-secondary" type="button" onclick="addLots()">Add Lots</button><br>


                        
                
                
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var lotsIndex = 1; // Start index for additional lotsDiv

    function addLots() {
        var container = document.getElementById('lots-container');
        var lotsDiv = document.createElement('div');
        lotsDiv.classList.add('lots');
        lotsDiv.innerHTML = `
            <div class="lots" style="border:1px solid gray;padding:5px;margin-bottom:15px;">
                <button class="btn btn-danger" type="button" onclick="removeLots(this)">Remove</button><br>               
                <label for="lot_title">Lot title</label>
                <input type="text" name="lot[${lotsIndex}][lot_title]" class="form-control" required>
                <label for="lot_qty">Lot Qty</label>
                <input type="number" name="lot[${lotsIndex}][lot_qty]" class="form-control" min="1" required>
                <label for="expiration_date">Expiration Date</label>
                <input type="date" name="lot[${lotsIndex}][expiration_date]" class="form-control" min="<?php echo date('Y-m-d'); ?>" required>     
            </div>
        `;
        container.appendChild(lotsDiv);
        lotsIndex++;  
    }

    function removeLots(button) {
        var lotsDiv = button.closest('.lots');
        lotsDiv.remove();
    }
</script>
@endsection