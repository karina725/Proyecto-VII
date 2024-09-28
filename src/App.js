import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
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
    <Router>
      <div className="App">
        <LoginForm />
        <div className="container">
          <h1>Sistema de Gestión de Estacionamientos</h1>
          {/* Definimos las rutas */}
          <Routes>
            <Route path="/usuarios" element={<UsuarioList />} />
            <Route path="/empleados" element={<EmpleadoList />} />
            <Route path="/estacionamientos" element={<EstacionamientoList />} />
            <Route path="/reservas" element={<ReservaList />} />
            <Route path="/liberaciones" element={<LiberacionList />} />
            <Route path="/logs" element={<LogList />} />
          </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
