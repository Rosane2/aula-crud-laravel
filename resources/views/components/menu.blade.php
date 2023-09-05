    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">
                        <span data-feather="home"></span>
                        Gestão Acadêmica
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Gerenciamentos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aluno.index') }}">
                        <span data-feather="users"></span>
                        Alunos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aluno.index') }}">
                        <span data-feather="calendar"></span>
                        Grade Academica
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Parametrizações
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('semestre.index') }}">
                        <span data-feather="paperclip"></span>
                        Ano/Semestre
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('turno.index') }}">
                        <span data-feather="sunset"></span>
                        Turno
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('curso.index') }}">
                        <span data-feather="layers"></span>
                        Cursos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tipostatus.index') }}">
                        <span data-feather="tag"></span>
                        Tipo de Status
                    </a>
                </li>

            </ul>

        </div>
    </nav>
