#include <stdio.h> 

int main() { 
    int t,n;
    scanf("%d",&t);
    while(t--)
    {
        scanf("%d",&n);
        int temp =n,a=1;
        while(temp!=0)
        {
            a = a*(temp%10);
            temp/=10;
            
        }
        printf("%d\n",a);
    }
    return(0);
}