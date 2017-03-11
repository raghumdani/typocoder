#include <stdio.h> 

#include <iostream>

#include <bits/stdc++.h>
using namespace std;
long long int c=0,n=1000000,x;
void SieveOfEratosthenes(int n)
{

    bool prime[n+1];
    memset(prime, true, sizeof(prime));

    for (int p=2; p*p<=n; p++)
    {

        if (prime[p] == true)
        {

            for (int i=p*2; i<=n; i += p)
                prime[i] = false;
        }
    }


    for (int p=2; p<=n; p++)
       if (prime[p])
          c++;

          cout<<c<<endl;
}


int main()
{

    long long int q,l;
    cin>>q;
    for(l=0;l<q;l++)
    {
        c=0;
        cin>>x;
        SieveOfEratosthenes(x);
    }


    return 0;
}
