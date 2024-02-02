#include<string>
#include<iostream>
using namespace std;

class Car
{

public:
    string name;
    string model;
    int year;
};

class ElectricCar:public Car
{
public:
    int battery_capa;
};

class GasCar: public Car
{
public:
    int fuel_eff;
};

int main()
{
    ElectricCar ELec;
    GasCar gas_sample;

    string type;

    while(true)
    {
        cout << endl;
        cout << "Enter car type (Electric/Gas):";
        cin >> type;
        cout << endl;

        if(type=="Electric")
        {
            cout << "Enter Name: ";
            cin >> ELec.name;
            cout << endl;
            cout << "Enter Model: ";
            cin.ignore();
            getline(cin, ELec.model);
            cout << endl;
            cout << "Enter year: ";
            cin >> ELec.year;
            cout << endl;
            cout << "Enter battery capacity(kwh): ";
            cin >> ELec.battery_capa;
            cout << endl;
            cout << "Car Information:" << endl;
            cout << "\t" << ELec.year << " " << ELec.name << " " << ELec.model << endl;
            cout << "\t" << "Battery capacity:" << ELec.battery_capa << " Kwh";
            continue;

        }

        else if(type=="Gas")
        {
            cout << "Enter Name: ";
            cin >> gas_sample.name;
            cout << endl;
            cout << "Enter Model: ";
            cin.ignore();
            getline(cin, gas_sample.model);
            cout << endl;
            cout << "Enter year: ";
            cin >> gas_sample.year;
            cout << endl;
            cout << "Enter fuel efficiency(MPG): ";
            cin >> gas_sample.fuel_eff;
            cout << endl;
            cout << "Car Information:" << endl;
            cout << "\t" << gas_sample.year << " " << gas_sample.name << " " << gas_sample.model << endl;
            cout << "\t" << "Fuel efficiency:" << gas_sample.fuel_eff << " MPG";
        }

    }


}
