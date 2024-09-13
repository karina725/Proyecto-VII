import React, { useState } from 'react';

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
    // Aquí puedes agregar la lógica para enviar los datos a un backend o realizar validaciones
    console.log(formData);
  };

  return (
    <form onSubmit={handleSubmit} style={{ maxWidth: '400px', margin: '0 auto' }}>
      <div>
        <label>Nombre:</label>
        <input
          type="text"
          name="nombre"
          value={formData.nombre}
          onChange={handleChange}
          required
        />
      </div>
      <div>
        <label>Número de Empleado:</label>
        <input
          type="text"
          name="numeroEmpleado"
          value={formData.numeroEmpleado}
          onChange={handleChange}
          required
        />
      </div>
      <div>
        <label>Correo Electrónico:</label>
        <input
          type="email"
          name="correo"
          value={formData.correo}
          onChange={handleChange}
          required
        />
      </div>
      <div>
        <label>Contraseña:</label>
        <input
          type="password"
          name="contraseña"
          value={formData.contraseña}
          onChange={handleChange}
          required
        />
      </div>
      <button type="submit">Iniciar Sesión</button>
    </form>
  );
};

export default LoginForm;