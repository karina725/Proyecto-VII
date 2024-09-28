import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import { BrowserRouter as Router, Route, Route } from 'react-router-dom';

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
          <Switch>
            <Route path="/usuarios" component={UsuarioList} />
            <Route path="/empleados" component={EmpleadoList} />
            <Route path="/estacionamientos" component={EstacionamientoList} />
            <Route path="/reservas" component={ReservaList} />
            <Route path="/liberaciones" component={LiberacionList} />
            <Route path="/logs" component={LogList} />
            <Route path="/" exact>
              <h2>Bienvenido al sistema de gestión</h2>
            </Route>
          </Switch>
        </div>
      </div>
    </Router>
  );
}

export default App;
