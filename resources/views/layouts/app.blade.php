<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'TRIAHub')</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: system-ui, sans-serif; margin: 0; background: #f4f6fb; color: #1f2937; }
        header { background: #1e3a8a; color: #fff; padding: 16px 24px; }
        header a { color: #fff; text-decoration: none; font-weight: 700; font-size: 1.25rem; }
        header span { opacity: .8; margin-left: 12px; font-size: .9rem; }
        main { max-width: 960px; margin: 24px auto; padding: 0 16px; }
        .topo { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .btn { display: inline-block; padding: 8px 14px; border: 0; border-radius: 6px; background: #2563eb; color: #fff; text-decoration: none; cursor: pointer; font-size: .9rem; }
        .btn-cinza { background: #6b7280; }
        .btn-vermelho { background: #dc2626; }
        .alerta { background: #dcfce7; border: 1px solid #86efac; padding: 10px 14px; border-radius: 6px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; }
        th, td { padding: 10px 12px; text-align: left; border-bottom: 1px solid #e5e7eb; font-size: .9rem; }
        th { background: #e0e7ff; }
        .acoes { display: flex; gap: 6px; }
        .acoes form { margin: 0; }
        .badge { padding: 2px 8px; border-radius: 999px; font-size: .75rem; background: #e5e7eb; }
        .badge-novo { background: #dbeafe; }
        .badge-em_analise { background: #fef3c7; }
        .badge-aprovado { background: #dcfce7; }
        .badge-descartado { background: #fee2e2; }
        .card { background: #fff; padding: 20px; border-radius: 8px; }
        label { display: block; font-weight: 600; margin: 12px 0 4px; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font: inherit; }
        .erro { color: #dc2626; font-size: .8rem; }
        .vazio { text-align: center; padding: 32px; background: #fff; border-radius: 8px; }
        .filtros { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; align-items: end; margin-bottom: 16px; }
        .filtros label { margin: 0 0 4px; font-size: .8rem; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('candidatos.index') }}">TRIAHub</a>
        <span>Banco de talentos</span>
    </header>
    <main>
        @if(session('sucesso'))
            <div class="alerta">{{ session('sucesso') }}</div>
        @endif

        @yield('conteudo')
    </main>
</body>
</html>