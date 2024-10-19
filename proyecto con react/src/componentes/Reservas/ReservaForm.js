import React, { useState } from 'react';

const ReservaForm = () => {
  const [empleado, setEmpleado] = useState('');
  const [estacionamiento, setEstacionamiento] = useState('');
  const [fechaReserva, setFechaReserva] = useState('');
  const [horaInicio, setHoraInicio] = useState('');
  const [horaFin, setHoraFin] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log({ empleado, estacionamiento, fechaReserva, horaInicio, horaFin });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Crear Reserva</h2>
      <label>
        Empleado:
        <input 
          type="text" 
          value={empleado} 
          onChange={(e) => setEmpleado(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Estacionamiento:
        <input 
          type="text" 
          value={estacionamiento} 
          onChange={(e) => setEstacionamiento(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Fecha de Reserva:
        <input 
          type="date" 
          value={fechaReserva} 
          onChange={(e) => setFechaReserva(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Hora de Inicio:
        <input 
          type="time" 
          value={horaInicio} 
          onChange={(e) => setHoraInicio(e.target.value)} 
          required 
        />
      </label>
      <br />
      <label>
        Hora de Fin:
        <input 
          type="time" 
          value={horaFin} 
          onChange={(e) => setHoraFin(e.target.value)} 
          required 
        />
      </label>
      <br />
      <button type="submit">Reservar</button>
    </form>
  );
};

export default ReservaForm;
