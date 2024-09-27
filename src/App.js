
import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import UsuarioList from './componentes/Usuarios/UsuarioList';
import EmpleadoList from './componentes/Empleados/EmpleadoList';
import EstacionamientoList from './componentes/Estacionamientos/EstacionamientoList';
import ReservaList from './componentes/Reservas/ReservaList';
import LiberacionList from './componentes/Liberaciones/LiberacionList';
import LogList from './componentes/Logs/LogList';
import LoginForm, {} from "./componentes/LoginForm"

function App() {
  return (
    <div className="App">
      <LoginForm></LoginForm>
       <div className="App">
        <div className="container">
          <h1>Sistema de Gestión de Estacionamientos</h1>
          <UsuarioList />
          <EmpleadoList />
          <EstacionamientoList />
          <ReservaList />
          <LiberacionList />
          <LogList />
        </div>
      </div>
    </div>
  );
}

export default App;
