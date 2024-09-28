import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import LoginForm from './componentes/LoginForm'; 
import UsuarioList from './componentes/Usuarios/UsuarioList';
import EmpleadoList from './componentes/Empleados/EmpleadoList';
import EstacionamientoList from './componentes/Estacionamientos/EstacionamientoList';
import ReservaList from './componentes/Reservas/ReservaList';
import LiberacionList from './componentes/Liberaciones/LiberacionList';
import LogList from './componentes/Logs/LogList';

function App() {
  return (
    <Router>
      <div className="App">
        <LoginForm />
        <div className="container">
          <h1>Sistema de Gestión de Estacionamientos</h1>
          <Routes>
            <Route path="/usuarios" element={<UsuarioList />} />
            <Route path="/empleados" element={<EmpleadoList />} />
            <Route path="/estacionamientos" element={<EstacionamientoList />} />
            <Route path="/reservas" element={<ReservaList />} />
            <Route path="/liberaciones" element={<LiberacionList />} />
            <Route path="/logs" element={<LogList />} />
            <Route path="/" element={<h2>Bienvenido al sistema de gestión</h2>} />
          </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
