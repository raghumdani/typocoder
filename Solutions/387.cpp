#include <bits/stdc++.h> 
using namespace std;
 
int main() { 
    int t, n;
    cin >> t;
    for(int i = 0; i<t; ++i)
    {
        long int prod = 1;
        cin >> n;
        while(n > 0)
        {
            int d = n%10;
            prod *= d;
            n/=10;
        }
        cout << prod << endl;
    }
     
    return(0);
}