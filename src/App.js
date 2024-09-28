import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';

import LoginForm from './componentes/LoginForm'; 
import UsuarioList from './componentes/Usuarios/UsuarioList';
import EmpleadoList from './componentes/Empleados/EmpleadoList';
import EstacionamientoList from './componentes/Estacionamientos/EstacionamientoList';
import ReservaList from './componentes/Reservas/ReservaList';
import LiberacionList from './componentes/Liberaciones/LiberacionList';
import LogList from './componentes/Logs/LogList';

function App() {
  return (
    <div className="App">
      <LoginForm />
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
  );
}

export default App;
