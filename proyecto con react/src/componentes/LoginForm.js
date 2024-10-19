import React, { useState } from 'react';
import "./LoginForm.css";

const LoginForm = () => {
  const [formData, setFormData] = useState({
    nombre: '',
    numeroEmpleado: '',
    correo: '',
    contraseña: ''
  });

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
  };

  return (
    <div className="login-container">
      <form onSubmit={handleSubmit} className="login-form">
        <h2>Iniciar Sesión</h2>
        <div className="form-group">
          <label>Nombre</label>
          <input
            type="text"
            name="nombre"
            value={formData.nombre}
            onChange={handleChange}
            required
          />
        </div>
        <div className="form-group">
          <label>Número de Empleado</label>
          <input
            type="text"
            name="numeroEmpleado"
            value={formData.numeroEmpleado}
            onChange={handleChange}
            required
          />
        </div>
        <div className="form-group">
          <label>Correo Electrónico</label>
          <input
            type="email"
            name="correo"
            value={formData.correo}
            onChange={handleChange}
            required
          />
        </div>
        <div className="form-group">
          <label>Contraseña</label>
          <input
            type="password"
            name="contraseña"
            value={formData.contraseña}
            onChange={handleChange}
            required
          />
        </div>
        <button type="submit" className="submit-button">Iniciar Sesión</button>
      </form>
    </div>
  );
};

export default LoginForm;
