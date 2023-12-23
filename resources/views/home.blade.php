@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="row mt-4 bt-4" id="main_div">
            
        </div>
        <div class="row mt-4 text-center">
            <div class="col-12">
                <button type="button" onclick="getQuotes()" class="btn btn-success pull-right">Refresh</button>
            </div>
        </div>
          
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  
  console.log('test....');

    function getQuotes() {
  
        $.get('/api/get-quote', bindData);

    }

    function bindData(res) {
        // console.log(res);
        buindData(res.quotes);
    }
    getQuotes();

    function buindData(data) {
        var divElement = document.getElementById("main_div");
        divElement.innerHTML = " ";
        for (i = 0; i < data.length; i++) {
            console.log('quotes: ');

            console.log(data[i].name.quote);

            var node = document.createElement("li");
            // Create a text node:
            // var textnode = document.createTextNode(data[i].quote.name);
            var textnode = document.createTextNode(data[i].name.quote);

            // Append the text node to the "li" node
            node.appendChild(textnode);
            document.getElementById("main_div").appendChild(node);
        }

    }
</script>
@endsection
