#include<bits/stdc++.h>
using namespace std;
int main()
{
    long long int t,n,rem,prod;
    cin>>t;
    while(t--)
    {
        cin>>n;
        prod=1;
        while(n)
        {
            rem=n%10;
            prod*=rem;
            n/=10;
            if(prod==0)
                break;
        }
        cout<<prod<<endl;
    }
    return 0;
}