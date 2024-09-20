import logo from './logo.svg';
import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import UsuarioList from './components/Usuarios/UsuarioList';
import EmpleadoList from './components/Empleados/EmpleadoList';
import EstacionamientoList from './components/Estacionamientos/EstacionamientoList';
import ReservaList from './components/Reservas/ReservaList';
import LiberacionList from './components/Liberaciones/LiberacionList';
import LogList from './components/Logs/LogList';
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
