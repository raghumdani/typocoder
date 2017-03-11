#include<bits/stdc++.h>
using namespace std;
int main()
{
    long long n,i;
    cin>>n;
    int a[n],b[n];
    long long s=0,s1=0;
    cin>>a[0];
    b[0]=a[0];
    s=a[0];
    for(i=1;i<n;i++)
    {
        cin>>a[i];
        b[i]=b[i-1]+a[i];
        s+=b[i];
    }
    sort(a,a+n);
    b[0]=a[0];
    s1=b[0];
    for(i=1;i<n;i++)
    {
        b[i]=b[i-1]+a[i];
        s1+=b[i];
    }
    cout<<s-s1<<endl;
    return 0;

}
