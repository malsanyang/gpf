const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"login":{"uri":"auth\/login","methods":["GET","HEAD"]},"auth.authenticate":{"uri":"auth\/authenticate","methods":["POST"]},"logout":{"uri":"auth\/logout","methods":["POST"]},"users.index":{"uri":"user-management\/users","methods":["GET","HEAD"]},"users.show":{"uri":"user-management\/users\/{id}","methods":["GET","HEAD"]},"users.delete":{"uri":"user-management\/users\/{id}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
