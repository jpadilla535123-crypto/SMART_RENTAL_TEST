import React, { useState } from 'react';
import { 
  Smartphone, 
  Lightbulb, 
  Thermometer, 
  Lock, 
  Camera, 
  Wifi,
  WifiOff,
  Power,
  PowerOff,
  Settings,
  AlertTriangle
} from 'lucide-react';

const SmartDevices = () => {
  const [devices, setDevices] = useState([
    {
      id: 1,
      name: 'Smart Thermostat',
      property: 'Sunset Villa #12',
      type: 'thermostat',
      status: 'online',
      value: '72°F',
      isActive: true,
      battery: 85
    },
    {
      id: 2,
      name: 'Front Door Lock',
      property: 'Downtown Loft #3',
      type: 'lock',
      status: 'online',
      value: 'Locked',
      isActive: true,
      battery: 65
    },
    {
      id: 3,
      name: 'Living Room Lights',
      property: 'Garden Court #15',
      type: 'light',
      status: 'online',
      value: '80% Brightness',
      isActive: true,
      battery: null
    },
    {
      id: 4,
      name: 'Security Camera',
      property: 'Riverside Manor #8',
      type: 'camera',
      status: 'offline',
      value: 'Recording',
      isActive: false,
      battery: 45
    },
    {
      id: 5,
      name: 'Kitchen Lights',
      property: 'Tech Hub #22',
      type: 'light',
      status: 'online',
      value: 'Off',
      isActive: false,
      battery: null
    },
    {
      id: 6,
      name: 'Smart Lock Pro',
      property: 'Historic Heights #7',
      type: 'lock',
      status: 'online',
      value: 'Unlocked',
      isActive: true,
      battery: 92
    },
    {
      id: 7,
      name: 'Climate Control',
      property: 'Ocean View #4',
      type: 'thermostat',
      status: 'online',
      value: '68°F',
      isActive: true,
      battery: 78
    },
    {
      id: 8,
      name: 'Outdoor Camera',
      property: 'Sunset Villa #5',
      type: 'camera',
      status: 'online',
      value: 'Monitoring',
      isActive: true,
      battery: 23
    }
  ]);

  const getDeviceIcon = (type: string) => {
    switch (type) {
      case 'thermostat':
        return Thermometer;
      case 'lock':
        return Lock;
      case 'light':
        return Lightbulb;
      case 'camera':
        return Camera;
      default:
        return Smartphone;
    }
  };

  const getStatusColor = (status: string) => {
    return status === 'online' ? 'text-green-500' : 'text-red-500';
  };

  const toggleDevice = (deviceId: number) => {
    setDevices(devices.map(device => 
      device.id === deviceId 
        ? { ...device, isActive: !device.isActive }
        : device
    ));
  };

  const getBatteryColor = (battery: number | null) => {
    if (battery === null) return 'text-slate-400';
    if (battery > 50) return 'text-green-500';
    if (battery > 20) return 'text-amber-500';
    return 'text-red-500';
  };

  const deviceStats = {
    total: devices.length,
    online: devices.filter(d => d.status === 'online').length,
    active: devices.filter(d => d.isActive).length,
    lowBattery: devices.filter(d => d.battery !== null && d.battery < 30).length
  };

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-bold text-slate-800 mb-2">Smart Devices</h1>
        <p className="text-slate-600">Monitor and control smart devices across all your properties.</p>
      </div>

      {/* Device Stats */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Total Devices</p>
              <p className="text-3xl font-bold text-slate-800 mt-1">{deviceStats.total}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
              <Smartphone className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Online</p>
              <p className="text-3xl font-bold text-green-600 mt-1">{deviceStats.online}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
              <Wifi className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Active</p>
              <p className="text-3xl font-bold text-purple-600 mt-1">{deviceStats.active}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
              <Power className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Low Battery</p>
              <p className="text-3xl font-bold text-red-600 mt-1">{deviceStats.lowBattery}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
              <AlertTriangle className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>
      </div>

      {/* Devices Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {devices.map((device) => {
          const DeviceIcon = getDeviceIcon(device.type);
          return (
            <div key={device.id} className="bg-white rounded-xl shadow-lg border border-slate-200 p-6 hover:shadow-xl transition-shadow duration-300">
              <div className="flex justify-between items-start mb-4">
                <div className="flex items-center space-x-3">
                  <div className={`w-12 h-12 rounded-lg flex items-center justify-center ${
                    device.isActive 
                      ? 'bg-gradient-to-r from-blue-500 to-purple-600' 
                      : 'bg-slate-200'
                  }`}>
                    <DeviceIcon className={`w-6 h-6 ${device.isActive ? 'text-white' : 'text-slate-400'}`} />
                  </div>
                  <div>
                    <h3 className="font-semibold text-slate-800">{device.name}</h3>
                    <p className="text-sm text-slate-500">{device.property}</p>
                  </div>
                </div>
                <button className="text-slate-400 hover:text-slate-600 transition-colors">
                  <Settings className="w-5 h-5" />
                </button>
              </div>

              <div className="flex items-center justify-between mb-4">
                <div className="flex items-center space-x-2">
                  {device.status === 'online' ? (
                    <Wifi className={`w-4 h-4 ${getStatusColor(device.status)}`} />
                  ) : (
                    <WifiOff className={`w-4 h-4 ${getStatusColor(device.status)}`} />
                  )}
                  <span className={`text-sm font-medium capitalize ${getStatusColor(device.status)}`}>
                    {device.status}
                  </span>
                </div>
                {device.battery !== null && (
                  <div className="flex items-center space-x-1">
                    <div className="w-6 h-3 border border-slate-300 rounded-sm relative">
                      <div 
                        className={`h-full rounded-sm ${getBatteryColor(device.battery)} bg-current`}
                        style={{ width: `${device.battery}%` }}
                      ></div>
                    </div>
                    <span className={`text-xs ${getBatteryColor(device.battery)}`}>
                      {device.battery}%
                    </span>
                  </div>
                )}
              </div>

              <div className="mb-6">
                <div className="flex justify-between items-center">
                  <span className="text-sm text-slate-600">Status:</span>
                  <span className="text-sm font-semibold text-slate-800">{device.value}</span>
                </div>
              </div>

              <div className="flex space-x-2">
                <button
                  onClick={() => toggleDevice(device.id)}
                  className={`flex-1 py-2 px-4 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center space-x-2 ${
                    device.isActive
                      ? 'bg-red-100 text-red-700 hover:bg-red-200'
                      : 'bg-green-100 text-green-700 hover:bg-green-200'
                  }`}
                >
                  {device.isActive ? (
                    <>
                      <PowerOff className="w-4 h-4" />
                      <span>Turn Off</span>
                    </>
                  ) : (
                    <>
                      <Power className="w-4 h-4" />
                      <span>Turn On</span>
                    </>
                  )}
                </button>
              </div>
            </div>
          );
        })}
      </div>
    </div>
  );
};

export default SmartDevices;