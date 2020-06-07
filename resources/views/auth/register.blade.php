@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row titulo">
        <h1>Cadastro</h1>
    </div>

    <div class="row subtitulo">
        <div class="col-sm-12">
            <p>Informações Pessoais</p>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- Nome | CPF --}}
        <div class="form-group row">

            <div class="col-md-8">
                <label for="name" class="col-form-label">{{ __('Nome Completo') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="cpf" class="col-form-label">{{ __('CPF') }}</label>
                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>

                @error('cpf')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        {{-- Instituição de Ensino e Celular --}}
        <div class="form-group row">
            <div class="col-md-8">
                <label for="instituicao" class="col-form-label">{{ __('Instituição de Vínculo') }}</label>
                <input id="instituicao" type="text" class="form-control @error('instituicao') is-invalid @enderror" name="instituicao" value="{{ old('instituicao') }}" required autocomplete="instituicao" autofocus>

                @error('instituicao')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="celular" class="col-form-label">{{ __('Celular') }}</label>
                <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

                @error('celular')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
                        
        </div>

        {{-- Email | Senha | Confirmar Senha --}}
        <div class="form-group row">

            <div class="col-md-4">
                <label for="email" class="col-form-label">{{ __('E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>    

            <div class="col-md-4">
                <label for="password" class="col-form-label">{{ __('Senha') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="password-confirm" class="col-form-label">{{ __('Confirme a Senha') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            
        </div>

        <div class="form-group row">
            <div class="col-md-4">
                <label for="cargo" class="col-form-label">{{ __('Cargo') }}</label>
                <select id="cargo" name="cargo" class="form-control" onchange="mudar()">
                    <option @if(old('cargo') == 'Professor') selected @endif value="Professor">Professor</option>
                    <option @if(old('cargo') == 'Técnico') selected @endif value="Técnico">Técnico</option>
                    <option @if(old('cargo') == 'Estudante') selected @endif value="Estudante">Estudante</option>
                </select>

                @error('cargo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="vinculo" class="col-form-label">{{ __('Vinculo') }}</label>
                <select name="vinculo" id="vinculo" class="form-control" onchange="mudar()">
                    <option @if(old('cargo') == 'Servidor na ativa') selected @endif value="Servidor na ativa">Servidor na ativa</option>
                    <option @if(old('cargo') == 'Servidor aposentado') selected @endif value="Servidor aposentado">Servidor aposentado</option>
                    <option @if(old('cargo') == 'Professor visitante') selected @endif value="Professor visitante">Professor visitante</option>
                    <option @if(old('cargo') == 'Pós-doutorando') selected @endif value="Pós-doutorando">Pós-doutorando</option>
                    <option @if(old('cargo') == 'Outro') selected @endif value="Outro">Outro</option>
                </select>
            </div>

            <div class="col-md-4" style="display: none;" id="divOutro">
                <label for="outro" class="col-form-label">{{ __('Qual?') }}</label>
                <input id="outro" type="text" class="form-control @error('outro') is-invalid @enderror" name="outro">
            </div>
        </div>

        
        <div id="proponente" style="display: block;">
            <div class="form-group row">
                            
                <div class="col-md-4">
                    <label for="SIAPE" class="col-form-label">{{ __('SIAPE') }}</label>
                    <input id="SIAPE" type="text" class="form-control @error('SIAPE') is-invalid @enderror" name="SIAPE" value="{{ old('SIAPE') }}" autocomplete="nome">

                    @error('SIAPE')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>            

                <div class="col-md-4">
                    <label for="titulacaoMaxima" class="col-form-label">{{ __('Titulação Maxima') }}</label>
                    <input id="titulacaoMaxima" type="text" class="form-control @error('titulacaoMaxima') is-invalid @enderror" name="titulacaoMaxima" value="{{ old('titulacaoMaxima') }}" autocomplete="nome">

                    @error('titulacaoMaxima')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="anoTitulacao" class="col-form-label">{{ __('Ano da Titulação') }}</label>
                    <input id="anoTitulacao" type="text" class="form-control @error('anoTitulacao') is-invalid @enderror" name="anoTitulacao" value="{{ old('anoTitulacao') }}" autocomplete="nome">

                    @error('anoTitulacao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="areaFormacao" class="col-form-label">{{ __('Area de Formação') }}</label>
                    <input id="areaFormacao" type="text" class="form-control @error('areaFormacao') is-invalid @enderror" name="areaFormacao" value="{{ old('areaFormacao') }}" autocomplete="nome">

                    @error('areaFormacao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="grandeArea" class="col-form-label">{{ __('Grande Área') }}</label>
                    <select name="grandeArea" id="" class="form-control">
                        @foreach ($grandeAreas as $area)
                        <option @if(old('grandeArea') == $area->nome) selected @endif value="{{$area->nome}}">{{$area->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="area" class="col-form-label">{{ __('Área') }}</label>
                    <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}">

                    @error('area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                                
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="subarea" class="col-form-label">{{ __('Subárea') }}</label>
                    <input id="subarea" type="text" class="form-control @error('subarea') is-invalid @enderror" name="subarea" value="{{ old('subarea') }}">

                    @error('subarea')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="linkLattes" class="col-form-label">{{ __('Link do curriculum lattes') }}</label>
                    <input id="linkLattes" type="text" class="form-control @error('linkLattes') is-invalid @enderror" name="linkLattes" value="{{ old('linkLattes') }}" autocomplete="nome">

                    @error('linkLattes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="bolsistaProdutividade" class="col-form-label">{{ __('Bolsista de Produtividade') }}</label><br>
                    <select name="bolsistaProdutividade" id="bolsistaProdutividade" class="form-control" onchange="mudarNivel()">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>

                <div class="col-md-1" id="nivelInput" style="display: block;">
                    <label for="nivel" class="col-form-label">{{ __('Nivel') }}</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="2">2</option>
                        <option value="1D">1D</option>
                        <option value="1B">1B</option>
                        <option value="1C">1C</option>
                        <option value="1A">1A</option>
                    </select>
                </div>                
            </div>
        </div>
    
        <div class="row justify-content-center" style="margin: 20px 0 20px 0">

            <div class="col-md-6" style="padding-left:0">
                <a class="btn btn-secondary botao-form" href="/" style="width:100%">Cancelar Cadastro</a>
            </div>
            <div class="col-md-6" style="padding-right:0">
                <button type="submit" class="btn btn-primary botao-form" style="width:100%">
                    {{ __('Finalizar Cadastro') }}
                </button>
            </div>
        </div>
    </form>

</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        var SPMaskBehavior = function(val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };
        $('#celular').mask(SPMaskBehavior, spOptions);

    });

    function mudar() {
        var divProponente = document.getElementById('proponente');
        var comboBoxCargo = document.getElementById('cargo');
        var comboBoxVinculo = document.getElementById('vinculo');

        if (comboBoxCargo.value === "Estudante" && comboBoxVinculo.value !== "Pós-doutorando") {
            divProponente.style.display = "none";
        } else {
            divProponente.style.display = "block";
        }

        outroVinculo();
    }

    function outroVinculo(){
        var comboBoxVinculo = document.getElementById('vinculo');
        var divOutro = document.getElementById('divOutro');

        if(comboBoxVinculo.value === "Outro"){
            divOutro.style.display = "block";
        }else{
            divOutro.style.display = "none";
        }
    }

    function mudarNivel(){
        var bolsista = document.getElementById('bolsistaProdutividade');
        var nivel = document.getElementById('nivelInput');

        if(bolsista.value === "sim"){
            nivel.style.display = "block";
        }else{
            nivel.style.display = "none";
        }
        console.log("a");
    }
</script>
@endsection