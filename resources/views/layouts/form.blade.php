@php
if(isset($edit) && !empty($edit)){//edit
    $method = 'PUT';
    $url = route('dishes.update',compact('dish'));
} else {//create
  $method = 'POST';
  $url = route('dishes.store');
}
@endphp

@section('content')
  <div class="container crud-form" style="padding-top: 25px; padding-bottom: 25px;">
    <form id="validateForm" action="{{$url}}" method="post" enctype="multipart/form-data">
      @csrf
      @method($method)
      <div class="form-group">
        <label for="brand">Nome</label>
        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{isset($dish) ? $dish->name : ''}}">
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
      </div>
      <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" type="text" name="description">{{isset($dish) ? $dish->description : ''}}</textarea>
        <div class="invalid-feedback">
          {{$errors->first('description')}}
        </div>
      </div>

      <div class="form-group">
        <label for="visible">Disponibile</label>
        <select class="form-control"  name="visible">
          <option value="1" {{ isset($dish) && $dish->visible=="1" ? 'selected' : ""}}>Sì</option>
          <option value="0" {{ isset($dish) && $dish->visible=="0" ? 'selected' : ""}}>No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="vegan">Vegano</label>
        <select class="form-control"  name="vegan">
          <option value="1" {{ isset($dish) && $dish->vegan=="1" ? 'selected' : ""}}>Sì</option>
          <option value="0" {{ isset($dish) && $dish->vegan=="0" ? 'selected' : ""}}>No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="gluten">Glutine</label>
        <select class="form-control"  name="gluten">
          <option value="1" {{ isset($dish) && $dish->gluten=="1" ? 'selected' : ""}}>Sì</option>
          <option value="0" {{ isset($dish) && $dish->gluten=="0" ? 'selected' : ""}}>No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="type">Tipo</label>
        <select class="form-control"  name="type">
          <option value="antipasto" {{ isset($dish) && $dish->type=="antipasto" ? 'selected=selected' : ""}}>Antipasto</option>
          <option value="primo" {{ isset($dish) && $dish->type=="primo" ? 'selected=selected' : ""}}>Primo</option>
          <option value="secondo" {{ isset($dish) && $dish->type=="secondo" ? 'selected=selected' : ""}}>Secondo</option>
          <option value="contorno" {{ isset($dish) && $dish->type=="contorno" ? 'selected=selected' : ""}}>Contorno</option>
          <option value="dessert" {{ isset($dish) && $dish->type=="dessert" ? 'selected=selected' : ""}}>Dessert</option>
        </select>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}" type="text" name="price" value="{{isset($dish) ? $dish->price : ''}}">
        <div class="invalid-feedback">
          {{$errors->first('price')}}
        </div>
      </div>
      <div class="form-group">
        <label for="image">Immagine
        @if (isset($dish)) <img src="{{asset($dish->img )}}" style="height:80px;width:auto;" alt="">@endif</label>
        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : ''}}"  type="file" name="image">
        <div class="invalid-feedback">
            {{$errors->first('image')}}
          </div>
    </div>

      <div class="d-flex justify-content-between form-buttons">
        <a href="{{route('dishes.index')}}" class="btn btn-light" role="button" aria-pressed="true">Torna alla lista piatti</a>
        <input class="btn btn-bg-salmon" type="submit" name="" value="Invia">
         </div>

    </form>
  </div>

