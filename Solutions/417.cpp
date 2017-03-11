#include <iostream>
using namespace std;

int main() {
    long long int T, N, prod, d;
    cin>>T;
    while(T--)
    {
        prod = 1;
        cin>>N;
        if (N == 0)
        {
            cout<<"0\n";
            break;
        }
        while(1)
        {
            if (N == 0)
               break;
            d = N % 10;
            prod *= d;
            N /= 10;
        }
        cout<<prod<<"\n";
    }
	return 0;
}